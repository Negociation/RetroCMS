<?php
// GENERATED CODE -- DO NOT EDIT!

namespace RetroRCON;

/**
 */
class RconClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Ping(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/Ping',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetOnlineCount(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/GetOnlineCount',
        $argument,
        ['\RetroRCON\OnlineCountResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\RefreshAppearanceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function RefreshAppearance(\RetroRCON\RefreshAppearanceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/RefreshAppearance',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\RefreshBadgesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function RefreshBadges(\RetroRCON\RefreshBadgesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/RefreshBadges',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function RefreshEvents(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/RefreshEvents',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function RefreshCatalogue(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/RefreshCatalogue',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function OpenInfobus(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/OpenInfobus',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Google\Protobuf\GPBEmpty $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CloseInfobus(\Google\Protobuf\GPBEmpty $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/CloseInfobus',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * TODO: Alert function with enum type
     * @param \RetroRCON\RoomAlertRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function AlertRoom(\RetroRCON\RoomAlertRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/AlertRoom',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\UserAlertRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function AlertUser(\RetroRCON\UserAlertRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/AlertUser',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\HotelAlertRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function AlertHotel(\RetroRCON\HotelAlertRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/AlertHotel',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\UserOnlineRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function IsUserOnline(\RetroRCON\UserOnlineRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/IsUserOnline',
        $argument,
        ['\RetroRCON\UserOnlineResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\Room $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ChangeRoom(\RetroRCON\Room $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/ChangeRoom',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\User $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ChangeUser(\RetroRCON\User $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/ChangeUser',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\BanRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Ban(\RetroRCON\BanRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/Ban',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\UnbanRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Unban(\RetroRCON\UnbanRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/Unban',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \RetroRCON\StarterRoomRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateStarterRoom(\RetroRCON\StarterRoomRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/RetroRCON.Rcon/CreateStarterRoom',
        $argument,
        ['\RetroRCON\Response', 'decode'],
        $metadata, $options);
    }

}
