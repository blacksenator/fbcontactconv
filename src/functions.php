<?php

namespace blacksenator;

require_once('Phonebooks/fritzadr.php');
require_once('Phonebooks/IPphones.php');

use \SimpleXMLElement;
use blacksenator\FritzAdr\fritzadr;
use blacksenator\fritzsoap\x_contact;
use blacksenator\IPphones\ipphones;

/**
 * provides the FRITZ!Box phonebook
 *
 * @param array $config
 * @return SimpleXMLElement
 */
function getPhonebook($config)
{
    $fritzbox = new x_contact($config['url'], $config['user'], $config['password']);
    $fritzbox->getClient();

    return $fritzbox->getPhonebook($config['phonebook']);
}

/**
 * converting FRITZ!Box XML phonebook into an
 * IP phone phonebook according to its specific
 * transformation description
 *
 * @param SimpleXMLElement $fbXMLPhonebook
 * @param array $config
 * @return
 */
function getIPPhonebook($fbXMLphonebook, $config)
{
    $converter = new ipphones();
    foreach ($config as $ipPhone => $ipPhoneConfig) {
        if (empty($ipPhoneConfig['xsl'])) {
            continue;
        }
        $converter->setXSL($ipPhoneConfig['xsl']);
        if (count($result = $converter->getValidationResult())) {
            error_log('XSL Error: ' . implode(', ', $result));
        }
        $destination = $ipPhoneConfig['path'] . $ipPhoneConfig['file'];
        error_log('... into a ' . $ipPhone . ' phonebook as: ' . $destination);
        $ipPhoneXML = $converter->getIPPhonebook($fbXMLphonebook);
        file_put_contents($destination, $ipPhoneXML);
    }
}

function convertFBphonebook($config)
{
    $fbXMLphonebook = getPhonebook($config['fritzbox']);
    getIPPhonebook($fbXMLphonebook, $config['ipPhonebooks']);
}
