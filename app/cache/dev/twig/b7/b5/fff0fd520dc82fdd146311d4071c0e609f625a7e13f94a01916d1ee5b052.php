<?php

/* AcmeDemoBundle:Article:index.html.twig */
class __TwigTemplate_b7b5fff0fd520dc82fdd146311d4071c0e609f625a7e13f94a01916d1ee5b052 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1 class=\"title\">";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
<ul id=\"demo-list\">
    <li><a href=\"";
        // line 3
        echo $this->env->getExtension('routing')->getPath("_article_view");
        echo "\">View</a></li>
    <li><a href=\"";
        // line 4
        echo $this->env->getExtension('routing')->getPath("_article_edit");
        echo "\">Edit</a></li>
</ul>";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Article:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 4,  25 => 3,  19 => 1,);
    }
}
