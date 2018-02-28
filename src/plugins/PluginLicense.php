<?php

namespace craftcom\plugins;

use craft\base\Model;

class PluginLicense extends Model
{
    public $id;
    public $pluginId;
    public $editionId;
    public $cmsLicenseId;
    public $expirable;
    public $expired;
    public $email;
    public $key;
    public $notes;
    public $lastVersion;
    public $lastAllowedVersion;
    public $lastActivityOn;
    public $lastRenewedOn;
    public $expiresOn;
    public $dateCreated;
    public $dateUpdated;
    public $uid;

    public function rules()
    {
        return [
            [['pluginId', 'editionId', 'expirable', 'expired', 'email', 'key'], 'required'],
            [['id', 'pluginId', 'editionId', 'cmsLicenseId'], 'number', 'integerOnly' => true, 'min' => 1],
            [['email'], 'email'],
        ];
    }
}
