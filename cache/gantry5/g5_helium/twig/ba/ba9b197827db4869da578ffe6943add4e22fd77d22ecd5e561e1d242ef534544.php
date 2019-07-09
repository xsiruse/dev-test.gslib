<?php

/* partials/page.html.twig */
class __TwigTemplate_95b9889acdffac77d7d3be5f5dffb7a17d95124bfafdf2ed5aeb978c0d9f9493 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/page.html.twig", "partials/page.html.twig", 1);
        $this->blocks = [
            'page_footer' => [$this, 'block_page_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_page_footer($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("page_footer", $context, $blocks);
        echo "
    <jdoc:include type=\"modules\" name=\"debug\" />
";
    }

    public function getTemplateName()
    {
        return "partials/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/page.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/media/gantry5/engines/nucleus/twig/partials/page.html.twig");
    }
}
