<?php
namespace RetroRCON;

use Grpc\ChannelCredentials as ChannelCredentials;
use Google\Protobuf\GPBEmpty as EmptyRequest;

class RemoteConnection
{
    private $client;

    public function __construct(array $options)
    {
        $this->client = new RconClient($options['host'] . ':' . $options['port'], [
            'credentials' => ChannelCredentials::createInsecure()
        ]);
    }

    public function getOnlineCount(): int
    {
        // Wait for RCON to become ready, with a 30ms timeout
        if (!$this->client->waitForReady(30 * 1000)) {
            return 0;
        }

        // Call emulator
        list($resp, $status) = $this->client->GetOnlineCount(new EmptyRequest())->wait();

        // Emulator is likely offline, return 0
        if ($status->code !== \Grpc\STATUS_OK) {
            return 0;
        }

        // Success!
        return $resp->getOnlineCount();
    }

    public function ping(): bool
    {
        // Wait for RCON to become ready, with a 30ms timeout
        if (!$this->client->waitForReady(30 * 1000)) {
            return false;
        }

        // Call emulator
        list($resp, $status) = $this->client->Ping(new EmptyRequest())->wait();

        if ($status->code !== \Grpc\STATUS_OK) {
            return false;
        }

        return $resp->getOk();
    }

    public function refreshLook(int $userId): bool
    {
        // Wait for RCON to become ready, with a 30ms timeout
        if (!$this->client->waitForReady(30 * 1000)) {
            return false;
        }

        $req = new RefreshAppearanceRequest();
        $req->setUserId($userId);

        // Call emulator
        list($resp, $status) = $this->client->RefreshAppearance($req)->wait();

        if ($status->code !== \Grpc\STATUS_OK) {
            return false;
        }

        return $resp->getOk();
    }

    public function refreshBadges(int $userId): bool
    {
        // Wait for RCON to become ready, with a 30ms timeout
        if (!$this->client->waitForReady(30 * 1000)) {
            return false;
        }

        $req = new RefreshBadgesRequest();
        $req->setUserId($userId);

        // Call emulator
        list($resp, $status) = $this->client->RefreshBadges($req)->wait();

        if ($status->code !== \Grpc\STATUS_OK) {
            return false;
        }

        return $resp->getOk();
    }

    public function isUserOnline($identifier): bool
    {
        // Wait for RCON to become ready, with a 30ms timeout
        if (!$this->client->waitForReady(30 * 1000)) {
            return false;
        }

        $req = new UserOnlineRequest();

        // Handle both isUserOnline("Ewout") and isUserOnline(1)
        if (gettype($identifier) == "string") {
            $req->setUsername($identifier);
        } else if (gettype($identifier) == "integer") {
            $req->setUserId($identifier);
        }

        // Call emulator
        list($resp, $status) = $this->client->IsUserOnline($req)->wait();

        if ($status->code !== \Grpc\STATUS_OK) {
            return false;
        }

        return $resp->getOnline();
    }

    public function createStarterRoom(int $userId, StarterRoomRequest_StarterRoomTheme $theme): bool
    {
        // Wait for RCON to become ready, with a 30ms timeout
        if (!$this->client->waitForReady(30 * 1000)) {
            return false;
        }

        $req = new StarterRoomRequest();
        $req->setUserId($userId);
        $req->setTheme($theme);

        // Call emulator
        list($resp, $status) = $this->client->CreateStarterRoom($req)->wait();

        if ($status->code !== \Grpc\STATUS_OK) {
            return false;
        }

        return $resp->getOk();
    }

    public function sendAlert(string $message, array $options): bool
    {
        // TODO: implement. ideas below
        // sendAlert("ur whole family tree LGBT", [
        //     'type' => 'user',
        //     'username' => 'Alex'
        // ])
        // sendAlert("no jews allowed", [
        //     'type' => 'user',
        //     'user_id' => 1
        // ])
        // sendAlert("no jews allowed", [
        //     'type' => 'user',
        //     'user_id' => 1
        // ])
        // setInfobusPoll("Would you go on a date with Hitler?", [
        //     'Yes',
        //     'No'
        // ])
        // sendAlert("free credits for all", [
        //     'type' => 'hotel'
        // ])
        // sendCredits("free credits for all", [
        //     'who' => 'everyone',
        //     'amount' => 1337
        // ])
        // $req = new HotelAlertRequest();
        // $req->setAlert($message);
        //
        // list($resp) = $this->client->RefreshBadges($req)->wait();
        // return $resp->getOk();
        return true;
    }
}
