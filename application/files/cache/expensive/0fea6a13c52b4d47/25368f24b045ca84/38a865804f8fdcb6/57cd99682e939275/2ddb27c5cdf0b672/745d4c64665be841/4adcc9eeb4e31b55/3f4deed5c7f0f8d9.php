<?php 
/* Cachekey: cache/stash_default/doctrine/[concrete\core\entity\notification\notificationalert$notification][1]/ */
/* Type: array */
/* Expiration: 2023-10-25T12:57:58+09:00 */



$loaded = true;
$expiration = 1698206278;

$data = array();

/* Child Type: array */
$data['return'] = array (
  0 => 
  Doctrine\ORM\Mapping\ManyToOne::__set_state(array(
     'targetEntity' => '\\Concrete\\Core\\Entity\\Notification\\Notification',
     'cascade' => NULL,
     'fetch' => 'LAZY',
     'inversedBy' => 'alerts',
  )),
  1 => 
  Doctrine\ORM\Mapping\JoinColumn::__set_state(array(
     'name' => 'nID',
     'referencedColumnName' => 'nID',
     'unique' => false,
     'nullable' => true,
     'onDelete' => NULL,
     'columnDefinition' => NULL,
     'fieldName' => NULL,
     'options' => 
    array (
    ),
  )),
);

/* Child Type: integer */
$data['createdOn'] = 1697782165;
