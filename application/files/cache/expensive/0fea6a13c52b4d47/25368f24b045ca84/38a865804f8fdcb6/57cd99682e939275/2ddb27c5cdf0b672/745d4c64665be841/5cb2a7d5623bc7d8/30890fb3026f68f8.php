<?php 
/* Cachekey: cache/stash_default/doctrine/[concrete\core\entity\calendar\calendareventversion$occurrences][1]/ */
/* Type: array */
/* Expiration: 2023-10-25T11:12:43+09:00 */



$loaded = true;
$expiration = 1698199963;

$data = array();

/* Child Type: array */
$data['return'] = array (
  0 => 
  Doctrine\ORM\Mapping\OneToMany::__set_state(array(
     'mappedBy' => 'version',
     'targetEntity' => 'CalendarEventVersionOccurrence',
     'cascade' => 
    array (
      0 => 'all',
    ),
     'fetch' => 'LAZY',
     'orphanRemoval' => false,
     'indexBy' => NULL,
  )),
  1 => 
  Doctrine\ORM\Mapping\JoinColumn::__set_state(array(
     'name' => 'versionOccurrenceID',
     'referencedColumnName' => 'versionOccurrenceID',
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
