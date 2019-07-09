<?php

/* @particles/frameworks.html.twig */
class __TwigTemplate_c359a1658edba20cb86a41c2ccdf25d1870fb3366440d6ad9e656b692c5ee772 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "jquery", []), "enabled", [])) {
            // line 2
            echo "    ";
            $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "jquery"], "method");
            // line 3
            echo "    ";
            if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "jquery", []), "ui_core", [])) {
                // line 4
                echo "        ";
                $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "jquery.ui.core"], "method");
                // line 5
                echo "    ";
            }
            // line 6
            echo "    ";
            if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "jquery", []), "ui_sortable", [])) {
                // line 7
                echo "        ";
                $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "jquery.ui.sortable"], "method");
                // line 8
                echo "    ";
            }
        }
        // line 10
        echo "
";
        // line 11
        if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "bootstrap", []), "enabled", [])) {
            // line 12
            echo "    ";
            $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "bootstrap.2"], "method");
        }
        // line 14
        echo "
";
        // line 15
        if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "mootools", []), "enabled", [])) {
            // line 16
            echo "    ";
            $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "mootools"], "method");
            // line 17
            echo "    ";
            if ($this->getAttribute($this->getAttribute(($context["particle"] ?? null), "mootools", []), "more", [])) {
                // line 18
                echo "        ";
                $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "mootools.more"], "method");
                // line 19
                echo "    ";
            }
        }
    }

    public function getTemplateName()
    {
        return "@particles/frameworks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 19,  63 => 18,  60 => 17,  57 => 16,  55 => 15,  52 => 14,  48 => 12,  46 => 11,  43 => 10,  39 => 8,  36 => 7,  33 => 6,  30 => 5,  27 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/frameworks.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/media/gantry5/engines/nucleus/particles/frameworks.html.twig");
    }
}
