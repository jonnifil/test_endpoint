<?php

namespace App\Services;

use App\Jobs\LogJob;
use App\Models\Client;
use App\Models\Dialog;
use App\Models\Message;
use Illuminate\Support\Facades\Cache;

class MessageService
{
    public function sendMessage(array $data): bool
    {
        $data['dialog_id'] = $this->getDialogId($data['external_client_id'], $data['client_phone']);
        unset($data['external_client_id']);
        try {
            Message::create($data);

            return true;
        } catch (\Exception $e) {
            /** Операцию записи в лог выносим в фоновый процесс */
            LogJob::dispatch($e->getMessage());
            return false;
        }
    }

    /**
     * Значения статичные - держим в кеше для уменьшения нагрузки на БД
     * @param string $clientUuid
     * @return int
     */
    protected function getDialogId(string $clientUuid, string $clientPhone): int
    {
        return Cache::rememberForever('dialogId_' . $clientUuid, function () use ($clientUuid, $clientPhone) {
            $clientId = Cache::rememberForever('clientId_' . $clientUuid, function () use ($clientUuid, $clientPhone) {
                return Client::firstOrCreate(['external_client_id' => $clientUuid], ['client_phone' => $clientPhone])->id;
            });
            $dialog = Dialog::firstOrCreate(['client_id' => $clientId]);

            return $dialog->id;
        });
    }
}
