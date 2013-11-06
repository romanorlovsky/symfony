<?php

/* AcmeDemoBundle:Article:layout.html.twig */
class __TwigTemplate_1d0183b3b73306e5309b9c55e784005f7c5d3a262e1fb2c1dabc0a9b8cf263b6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");

        $this->blocks = array(
            'content_header_more' => array($this, 'block_content_header_more'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content_header_more($context, array $blocks = array())
    {
        // line 4
        echo "    <li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("_article");
        echo "\">Article</a></li>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Article:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  38 => 6,  35 => 5,  29 => 3,);
    }
}
