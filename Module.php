<?php
/**
 * @Author: Jérôme URBAN
 * @Contact: dev@oxalis-fr.com
 * @Company: Oxalis France
 */
namespace Zf2TcPdfOldVersion;

if(defined('APPLICATION_PATH')) {
    require_once APPLICATION_PATH . '/config/tcpdf_config_isem.php';
}

class Module
{
    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * @return array
     */
    public function getServiceConfig()
    {
        $module = $this;
        return array(
            'factories' => array(
                'Zf2TcPdfOldVersion' => function () use ($module) {
                    return $module;
                },
            ),
        );
    }

    /**
     * @param string $orientation
     * @param string $unit
     * @param array  $format
     * @param bool   $unicode
     * @param string $encoding
     * @param bool   $diskCache
     * @param bool   $pdfA
     *
     * @return mixed
     * @throws Exception\RuntimeException
     */
    public function MyPdf
    (
        $orientation = 'P',
        $unit = 'mm',
        $format = array(210,297),
        $unicode = true,
        $encoding = 'UTF-8',
        $diskCache = false,
        $pdfA = false
    ){
        try {
            $MyPdf = new \TCPDF
            (
                $orientation,
                $unit,
                $format,
                $unicode,
                $encoding,
                $diskCache,
                $pdfA
            );
        } catch (\Exception $e) {
            throw new Exception\RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
        return $MyPdf;
    }
}
