<?php

use Symfony\Component\Security\Core\SecurityContext;

class :symfony:session:authentication-error extends :symfony:base {

  public function render() {
    $session = self::$container->get('request')->getSession();
    $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);

    if (!$error) {
      return <x:frag />;
    }
    $session->set(SecurityContext::AUTHENTICATION_ERROR, null);

    return
      <div>
        <p>{$error->getMessage()}</p>
        <p>{$error->getExtraInformation()}</p>
      </div>;
  }

}
