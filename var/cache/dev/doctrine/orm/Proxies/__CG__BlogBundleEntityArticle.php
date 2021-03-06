<?php

namespace Proxies\__CG__\BlogBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Article extends \BlogBundle\Entity\Article implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'id', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'titre', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'contenu', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'dateAjout', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'dateModif', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'photopath', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'file'];
        }

        return ['__isInitialized__', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'id', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'titre', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'contenu', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'dateAjout', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'dateModif', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'photopath', '' . "\0" . 'BlogBundle\\Entity\\Article' . "\0" . 'file'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Article $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getWebPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWebPath', []);

        return parent::getWebPath();
    }

    /**
     * {@inheritDoc}
     */
    public function getFile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFile', []);

        return parent::getFile();
    }

    /**
     * {@inheritDoc}
     */
    public function setFile($file)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFile', [$file]);

        return parent::setFile($file);
    }

    /**
     * {@inheritDoc}
     */
    public function UploadProfilePicture()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'UploadProfilePicture', []);

        return parent::UploadProfilePicture();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setTitre($titre)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTitre', [$titre]);

        return parent::setTitre($titre);
    }

    /**
     * {@inheritDoc}
     */
    public function getTitre()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTitre', []);

        return parent::getTitre();
    }

    /**
     * {@inheritDoc}
     */
    public function setContenu($contenu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContenu', [$contenu]);

        return parent::setContenu($contenu);
    }

    /**
     * {@inheritDoc}
     */
    public function getContenu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContenu', []);

        return parent::getContenu();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateAjout($dateAjout)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateAjout', [$dateAjout]);

        return parent::setDateAjout($dateAjout);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateAjout()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateAjout', []);

        return parent::getDateAjout();
    }

    /**
     * {@inheritDoc}
     */
    public function setDateModif($dateModif)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDateModif', [$dateModif]);

        return parent::setDateModif($dateModif);
    }

    /**
     * {@inheritDoc}
     */
    public function getDateModif()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateModif', []);

        return parent::getDateModif();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhotopath($photopath)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhotopath', [$photopath]);

        return parent::setPhotopath($photopath);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhotopath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhotopath', []);

        return parent::getPhotopath();
    }

}
