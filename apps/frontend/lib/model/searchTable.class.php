<?php

/**
 * searchTable
 */
class searchTable extends Doctrine_Table
{
  public static function getProduct($search){
    return Doctrine_Query::create()
            ->from('product p')
            ->leftJoin('p.Translation pt')
            ->where('pt.name LIKE ?', "%$search%")
            ->andWhere('p.hidden = 0')
            ->andWhere('pt.lang = ?', sfContext::getInstance()->getUser()->getCulture())
            ->execute();
  }
  
  public static function getNews($search){
    return Doctrine_Query::create()
            ->from('news n')
            ->leftJoin('n.Translation nt')
            ->andWhere('n.hidden = 0')
            ->andWhere('n.date_from <= ?', date('Y-m-d'))
            ->andWhere('nt.lang = ?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere("nt.title LIKE '%$search%' OR nt.sneak_peak LIKE '%$search%' OR nt.body LIKE '%$search%'")
            ->execute();
  }
  
  public static function getArticle($search){
    return Doctrine_Query::create()
            ->from('article a')
            ->leftJoin('a.Translation at')
            ->andWhere('a.hidden = 0')
            ->andWhere('a.date_from <= ?', date('Y-m-d'))
            ->andWhere('at.lang = ?', sfContext::getInstance()->getUser()->getCulture())
            ->andWhere("at.title LIKE '%$search%' OR at.sneak_peak LIKE '%$search%' OR at.body LIKE '%$search%'")
            ->execute();
  }
}