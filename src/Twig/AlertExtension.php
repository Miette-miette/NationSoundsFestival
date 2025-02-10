<?php

namespace App\Twig;

use App\Repository\AlertRepository;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AlertExtension extends AbstractExtension
{
    /**
     * @var AlertRepository;
     */
    private $alertRepository;

    /**
     * @var Environement
     */
    private $twig;

    public function __construct(AlertRepository $alertRepository, Environment $twig)
    {
        $this->alertRepository = $alertRepository;
        $this->twig = $twig;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('alert', [$this, 'getAlert'], ['is_safe' => ['html']])
        ];
    }

    public function getAlert()
    {
        $alert = $this->alertRepository->findAll();

        return $this->twig->render('partials/_alert.html.twig', [
            'alerts' => $alert
        ]);
    }

}