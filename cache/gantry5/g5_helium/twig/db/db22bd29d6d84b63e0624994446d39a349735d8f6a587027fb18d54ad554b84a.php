<?php

/* @particles/cookie-consent.html.twig */
class __TwigTemplate_9060810c8869550d99fedf330767ef4d23ea0333efd79268f50f302ff9e92b10 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/cookie-consent.html.twig", 1);
        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascript_footer' => [$this, 'block_javascript_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 4
        echo "    ";
        if ($this->getAttribute(($context["particle"] ?? null), "enabled", [])) {
            // line 5
            echo "        ";
            $this->displayParentBlock("stylesheets", $context, $blocks);
            echo "
        ";
            // line 6
            if (((($this->getAttribute(($context["particle"] ?? null), "theme", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "theme", []), "dark-bottom")) : ("dark-bottom")) == "dark-bottom")) {
                // line 7
                echo "            <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/dark-bottom.css\" type=\"text/css\"/>
        ";
            }
            // line 9
            echo "        ";
            if (((($this->getAttribute(($context["particle"] ?? null), "theme", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "theme", []), "dark-bottom")) : ("dark-bottom")) == "dark-top")) {
                // line 10
                echo "            <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/dark-top.css\" type=\"text/css\"/>
        ";
            }
            // line 12
            echo "        ";
            if (((($this->getAttribute(($context["particle"] ?? null), "theme", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "theme", []), "dark-bottom")) : ("dark-bottom")) == "dark-floating")) {
                // line 13
                echo "            <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/dark-floating.css\" type=\"text/css\"/>
        ";
            }
            // line 15
            echo "        ";
            if (((($this->getAttribute(($context["particle"] ?? null), "theme", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "theme", []), "dark-bottom")) : ("dark-bottom")) == "dark-floating-tada")) {
                // line 16
                echo "            <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/dark-floating-tada.css\" type=\"text/css\"/>
        ";
            }
            // line 18
            echo "        ";
            if (((($this->getAttribute(($context["particle"] ?? null), "theme", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "theme", []), "dark-bottom")) : ("dark-bottom")) == "dark-inline")) {
                // line 19
                echo "            <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/dark-inline.css\" type=\"text/css\"/>
        ";
            }
            // line 21
            echo "        ";
            if (((($this->getAttribute(($context["particle"] ?? null), "theme", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "theme", []), "dark-bottom")) : ("dark-bottom")) == "light-bottom")) {
                // line 22
                echo "            <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/light-bottom.css\" type=\"text/css\"/>
        ";
            }
            // line 24
            echo "        ";
            if (((($this->getAttribute(($context["particle"] ?? null), "theme", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "theme", []), "dark-bottom")) : ("dark-bottom")) == "light-top")) {
                // line 25
                echo "            <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/light-top.css\" type=\"text/css\"/>
        ";
            }
            // line 27
            echo "        ";
            if (((($this->getAttribute(($context["particle"] ?? null), "theme", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "theme", []), "dark-bottom")) : ("dark-bottom")) == "light-floating")) {
                // line 28
                echo "            <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/light-floating.css\" type=\"text/css\"/>
        ";
            }
            // line 30
            echo "    ";
        }
    }

    // line 33
    public function block_javascript_footer($context, array $blocks = [])
    {
        // line 34
        echo "    ";
        if ($this->getAttribute(($context["particle"] ?? null), "enabled", [])) {
            // line 35
            echo "        ";
            $this->displayParentBlock("javascript_footer", $context, $blocks);
            echo "
        <script type=\"text/javascript\">
            window.cookieconsent_options = {
                message: '";
            // line 38
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "messagetext", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "messagetext", []), "This website uses cookies to ensure you get the best experience on our website.")) : ("This website uses cookies to ensure you get the best experience on our website.")), "js"), "html", null, true);
            echo "',
                learnMore: '";
            // line 39
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "rmtext", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "rmtext", []), "Read More...")) : ("Read More...")), "js"), "html", null, true);
            echo "',
                ";
            // line 40
            if ($this->getAttribute(($context["particle"] ?? null), "rmlink", [])) {
                // line 41
                echo "                    link: '";
                echo $this->getAttribute(($context["particle"] ?? null), "rmlink", []);
                echo "',
                    target: '";
                // line 42
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "target", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "target", []), "_parent")) : ("_parent")));
                echo "',
                ";
            }
            // line 44
            echo "                dismiss: '";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "accepttext", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "accepttext", []), "Got it!")) : ("Got it!")), "js"), "html", null, true);
            echo "',
                theme: '";
            // line 45
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "theme", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "theme", []), "dark-bottom")) : ("dark-bottom")));
            echo "'
            };
        </script>
        <script src=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js\" type=\"text/javascript\"></script>
    ";
        }
    }

    public function getTemplateName()
    {
        return "@particles/cookie-consent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 45,  133 => 44,  128 => 42,  123 => 41,  121 => 40,  117 => 39,  113 => 38,  106 => 35,  103 => 34,  100 => 33,  95 => 30,  91 => 28,  88 => 27,  84 => 25,  81 => 24,  77 => 22,  74 => 21,  70 => 19,  67 => 18,  63 => 16,  60 => 15,  56 => 13,  53 => 12,  49 => 10,  46 => 9,  42 => 7,  40 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/cookie-consent.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/custom/particles/cookie-consent.html.twig");
    }
}
