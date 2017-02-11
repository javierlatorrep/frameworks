<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository
{
    /**
     * @return Book[]
     */
    public function findAllBooksOrderedByPublicationDate()
    {
        return $this->createQueryBuilder('book')
            ->orderBy('book.publicationDate', 'DESC')
            ->getQuery()
            ->execute();
    }
}
