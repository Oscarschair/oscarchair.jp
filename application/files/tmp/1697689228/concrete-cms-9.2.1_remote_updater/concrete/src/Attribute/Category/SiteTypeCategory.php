<?php

namespace Concrete\Core\Attribute\Category;

use Concrete\Core\Entity\Attribute\Key\Key;
use Concrete\Core\Entity\Attribute\Key\SiteKey;
use Concrete\Core\Entity\Attribute\Value\SiteTypeValue;
use Concrete\Core\Entity\Attribute\Value\SiteValue;
use Concrete\Core\Entity\Site\Site;

class SiteTypeCategory extends AbstractStandardCategory
{
    public function createAttributeKey()
    {
        return new SiteKey();
    }

    public function getSearchIndexer()
    {
        return false;
    }

    public function getIndexedSearchTable()
    {
        return false;
    }

    /**
     * @param $mixed Site
     *
     * @return mixed
     */
    public function getIndexedSearchPrimaryKeyValue($mixed)
    {
        return false;
    }

    public function getSearchIndexFieldDefinition()
    {
        return false;
    }

    public function getAttributeKeyRepository()
    {
        return $this->entityManager->getRepository(SiteKey::class);
    }

    public function getAttributeValueRepository()
    {
        return $this->entityManager->getRepository(SiteValue::class);
    }

    public function getAttributeValues($skeleton)
    {
        $r = $this->entityManager->getRepository(SiteTypeValue::class);

        return $r->findBy([
            'skeleton' => $skeleton,
        ]);
    }

    /**
     * @param Key $key
     * @param \Concrete\Core\Entity\Site\Skeleton $skeleton
     */
    public function getAttributeValue(Key $key, $skeleton)
    {
        $cacheKey = sprintf('attribute/value/%s/sitetype/%d', $key->getAttributeKeyHandle(), $skeleton->getSiteSkeletonID());
        $parameters = [
            'skeleton' => $skeleton,
            'attribute_key' => $key,
        ];

        return $this->getAttributeValueEntity($cacheKey, $parameters);
    }
}
