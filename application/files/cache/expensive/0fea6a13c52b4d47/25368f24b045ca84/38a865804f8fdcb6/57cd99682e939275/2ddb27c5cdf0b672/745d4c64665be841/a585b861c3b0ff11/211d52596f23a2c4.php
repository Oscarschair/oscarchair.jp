<?php 
/* Cachekey: cache/stash_default/doctrine/[concrete\core\entity\board\datasource\configuration\configuration][1]/ */
/* Type: array */
/* Expiration: 2023-10-24T21:47:58+09:00 */



$loaded = true;
$expiration = 1698151678;

$data = array();

/* Child Type: array */
$data['return'] = array (
  0 => 
  Doctrine\ORM\Mapping\Entity::__set_state(array(
     'repositoryClass' => NULL,
     'readOnly' => false,
  )),
  1 => 
  Doctrine\ORM\Mapping\Table::__set_state(array(
     'name' => 'BoardConfiguredDataSourceConfiguration',
     'schema' => NULL,
     'indexes' => NULL,
     'uniqueConstraints' => NULL,
     'options' => 
    array (
    ),
  )),
  2 => 
  Doctrine\ORM\Mapping\InheritanceType::__set_state(array(
     'value' => 'JOINED',
  )),
  3 => 
  Doctrine\ORM\Mapping\DiscriminatorColumn::__set_state(array(
     'name' => 'type',
     'type' => 'string',
     'length' => NULL,
     'columnDefinition' => NULL,
     'enumType' => NULL,
  )),
);

/* Child Type: integer */
$data['createdOn'] = 1697782165;
