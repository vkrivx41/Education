<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* News/index.twig */
class __TwigTemplate_4943da0a92e13645ca3e5b164696d4178d00e0c10a3f4eb4743604cf28b8223f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "

<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link rel=\"stylesheet\" href=\"/style/main.css\">
</head>
<body>
    <img src='./images/image1.png'>
</body>
</html>";
    }

    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, ($context["News"] ?? null), "html", null, true);
        echo " ";
    }

    public function getTemplateName()
    {
        return "News/index.twig";
    }

    public function getDebugInfo()
    {
        return array (  48 => 9,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "News/index.twig", "C:\\xampp1\\htdocs\\EducIrere\\Views\\News\\index.twig");
    }
}
