<?php

namespace MCM\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MCM\DemoBundle\Entity\FootballTeam;

use MCM\DemoBundle\Entity\Person;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MCMDemoBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function showAction($id) 
    {

//        $person = $this->getDoctrine()
//           ->getRepository('MCMDemoBundle:Person')
//           ->find($id);
        
        
//        if (!$person) {
//            throw $this->createNotFoundException(
//                'No person found for id '. $id
//            );
//        }
        
//        $team = $this->getDoctrine()->getRepository('MCMDemoBundle:FootballTeam')->find(1);        
//        $person->setFavFootballTeam($team);

        $person = new Person();
        $person->setName('Ann')
               ->setAge(24);               

        $em = $this->getDoctrine()->getManager();
        $em->persist($person);
        $em->flush();
        
        
        exit(\Doctrine\Common\Util\Debug::dump($person));
//        return $this->render('MCMDemoBundle:Person:show.html.twig', [
//                                'person' => $person
//        ]);
    }
    
    public function showAllAction() 
    {
//        $r = $this->getDoctrine()->getRepository('MCMDemoBundle:Person');
//        
//        $persons = $r->findAll();
        
//        $query = $r->createQueryBuilder('p')
//                ->where('p.name = :name')
//                ->setParameter('name', 'John')
//                ->getQuery();
//        $em = $this->getDoctrine()->getManager();
        
//        $query = $em->createQuery('
//            SELECT p
//            FROM MCMDemoBundle:Person as p
//            WHERE p.name = :name
//        ')->setParameter('name', 'Joe');
//        
//        $persons = $query->getResult(); 
//        
//        return $this->render('MCMDemoBundle:Person:showAll.html.twig', [
//                                'persons' => $persons
//        ]);
        $em = $this->getDoctrine()->getManager();
        $persons = $em->getRepository('MCMDemoBundle:Person')
                        ->findAllOrderedByName();
        exit(\Doctrine\Common\Util\Debug::dump($persons));
    }
    
    public function createAction()
    {
        $person = new Person();
        $person->setName('Joe');
        $person->setAge(15);
        $person->setFavFootballTeam('WisłąśżźśąĄŚŻŹĆ');
//        $product->setName('Keyboard');
//        $product->setPrice(19.99);
//        $product->setDescription('Ergonomic and stylish!');
//
        $em = $this->getDoctrine()->getManager();
//
        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($person);
//
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();
        exit(\Doctrine\Common\Util\Debug::dump($person));
//        exit(\Doctrine\Common\Util\Debug::toString($person));
//        return new Response('Saved new product with id '.$person->getFavFootballTeam());
    }
    public function testAction() 
    {
        $repository = $this->getDoctrine()->getRepository('MCMDemoBundle:Person');
        
        $query = $repository->createQueryBuilder('p')
                            ->addSelect('ft')
                            ->leftJoin('p.favFootballTeam', 'ft')
                            ->where('p.name = :name')
                            ->setParameter('name', 'Joe')
                            ->getQuery();
        
        $person = $query->getSingleResult();
        
//        $repository = $this->getDoctrine()->getRepository('MCMDemoBundle:FootballTeam');
//        
//        $team = $repository->find(2);

        $team = $this->getDoctrine()->getRepository('MCMDemoBundle:FootballTeam')->find(1);        
        $person->setFavFootballTeam($team);
        
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($person);
        $em->flush();
        
        
        exit(\Doctrine\Common\Util\Debug::dump($person));
    }
}
