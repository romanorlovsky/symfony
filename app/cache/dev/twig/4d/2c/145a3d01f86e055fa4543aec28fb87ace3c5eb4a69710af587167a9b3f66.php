<?php

/* AcmeDemoBundle:Article:edit.html.twig */
class __TwigTemplate_4d2c145a3d01f86e055fa4543aec28fb87ace3c5eb4a69710af587167a9b3f66 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle:Article:layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle:Article:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["page_title"]) ? $context["page_title"] : $this->getContext($context, "page_title")), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "   ";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Article:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  35 => 5,  29 => 3,);
    }
}
