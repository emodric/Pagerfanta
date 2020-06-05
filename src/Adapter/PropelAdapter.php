<?php

/*
 * This file is part of the Pagerfanta package.
 *
 * (c) Pablo Díez <pablodip@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pagerfanta\Adapter;

trigger_deprecation('pagerfanta/pagerfanta', '2.2', 'The "%s" adapter is deprecated and will be removed in 3.0.', PropelAdapter::class);

/**
 * PropelAdapter.
 *
 * @author William DURAND <william.durand1@gmail.com>
 * @deprecated to be removed in 3.0
 */
class PropelAdapter implements AdapterInterface
{
    private $query;

    /**
     * Constructor.
     *
     * @param \ModelCriteria $query
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Returns the query.
     *
     * @return \ModelCriteria
     */
    public function getQuery()
    {
        return $this->query;
    }

    public function getNbResults()
    {
        $q = clone $this->getQuery();

        $q->limit(0);
        $q->offset(0);

        return $q->count();
    }

    public function getSlice($offset, $length)
    {
        $q = clone $this->getQuery();

        $q->limit($length);
        $q->offset($offset);

        return $q->find();
    }
}
