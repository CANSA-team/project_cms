<?php
 namespace MailPoetVendor; if (!defined('ABSPATH')) exit; interface Swift_Signers_BodySigner extends \MailPoetVendor\Swift_Signer { public function signMessage(\MailPoetVendor\Swift_Message $message); public function getAlteredHeaders(); } 