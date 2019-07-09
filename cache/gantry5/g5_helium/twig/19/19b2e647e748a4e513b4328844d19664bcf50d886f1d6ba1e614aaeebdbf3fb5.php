<?php

/* error.html.twig */
class __TwigTemplate_34a6f1862decc26022a09e3e85d7b17775f9a180f08c0e35ba5219130555ab92 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/page.html.twig", "error.html.twig", 1);
        $this->blocks = [
            'page_head' => [$this, 'block_page_head'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "partials/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_page_head($context, array $blocks = [])
    {
        // line 4
        $this->loadTemplate("partials/error_head.html.twig", "error.html.twig", 4)->display($context);
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        // line 8
        echo "    <h1>";
        echo twig_escape_filter($this->env, (((isset($context["errorcode"]) || array_key_exists("errorcode", $context))) ? (_twig_default_filter(($context["errorcode"] ?? null), 500)) : (500)), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (((isset($context["error"]) || array_key_exists("error", $context))) ? (_twig_default_filter(($context["error"] ?? null), "Unknown Error")) : ("Unknown Error")), "html", null, true);
        echo "</h1>
    ";
        // line 9
        echo ($context["backtrace"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 9,  39 => 8,  36 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "error.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/media/gantry5/engines/nucleus/twig/error.html.twig");
    }
}
