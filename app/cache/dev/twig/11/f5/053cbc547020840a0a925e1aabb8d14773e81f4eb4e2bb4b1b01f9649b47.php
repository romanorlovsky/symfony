<?php

/* AcmeDemoBundle:Article:view.html.twig */
class __TwigTemplate_11f5053cbc547020840a0a925e1aabb8d14773e81f4eb4e2bb4b1b01f9649b47 extends Twig_Template
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
        echo "<h1>View ";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "!</h1>
<ul>
    <li>
        <strong>ID:</strong> ";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "
    </li>
    <li>
        <strong>Title:</strong> ";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "
    </li>
    <li>
        <strong>Description:</strong> ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["desc"]) ? $context["desc"] : $this->getContext($context, "desc")), "html", null, true);
        echo "
    </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Article:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 10,  32 => 7,  26 => 4,  19 => 1,);
    }
}
