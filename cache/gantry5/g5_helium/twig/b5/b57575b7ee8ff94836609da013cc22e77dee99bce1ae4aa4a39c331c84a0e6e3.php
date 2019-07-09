<?php

/* @particles/owlcarousel.html.twig */
class __TwigTemplate_97110068c25af5ab8ff8e1524e2c629da8c8818dc2ad2f721eeed40a0ab5bb3a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/owlcarousel.html.twig", 1);
        $this->blocks = [
            'particle' => [$this, 'block_particle'],
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
    public function block_particle($context, array $blocks = [])
    {
        // line 4
        echo "
    <div class=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "class", []));
        echo "\">
        ";
        // line 6
        if ($this->getAttribute(($context["particle"] ?? null), "title", [])) {
            echo "<h2 class=\"g-title\">";
            echo $this->getAttribute(($context["particle"] ?? null), "title", []);
            echo "</h2>";
        }
        // line 7
        echo "
        <div id=\"g-owlcarousel-";
        // line 8
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" class=\"g-owlcarousel owl-carousel ";
        if (($this->getAttribute(($context["particle"] ?? null), "imageOverlay", []) == "enable")) {
            echo "has-color-overlay";
        }
        echo "\">

            ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["particle"] ?? null), "items", []));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 11
            echo "                ";
            if ( !$this->getAttribute($context["item"], "disable", [])) {
                // line 12
                echo "                    <div class=\"g-owlcarousel-item ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "class", []));
                echo "\">
                        <div class=\"g-owlcarousel-item-wrapper\">
                            <div class=\"g-owlcarousel-item-img\">
                                <img src=\"";
                // line 15
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($context["item"], "image", [])));
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "title", []));
                echo "\" />
                            </div>
                            <div class=\"g-owlcarousel-item-content-container\">
                                <div class=\"g-owlcarousel-item-content-wrapper\">
                                    <div class=\"g-owlcarousel-item-content\">
                                        ";
                // line 20
                if ($this->getAttribute($context["item"], "title", [])) {
                    // line 21
                    echo "                                            <h1 class=\"g-owlcarousel-item-title\">";
                    echo $this->getAttribute($context["item"], "title", []);
                    echo "</h1>";
                }
                // line 22
                echo "                                        ";
                if ($this->getAttribute($context["item"], "desc", [])) {
                    // line 23
                    echo "                                            <h2 class=\"g-owlcarousel-item-desc\">";
                    echo $this->getAttribute($context["item"], "desc", []);
                    echo "</h2>";
                }
                // line 24
                echo "                                        ";
                if ($this->getAttribute($context["item"], "link", [])) {
                    // line 25
                    echo "                                            <div class=\"g-owlcarousel-item-link\">
                                                <a target=\"_self\" class=\"g-owlcarousel-item-button button ";
                    // line 26
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "buttonclass", []));
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "link", []));
                    echo "\">
                                                    ";
                    // line 27
                    echo $this->getAttribute($context["item"], "linktext", []);
                    echo "
                                                </a>
                                            </div>
                                        ";
                }
                // line 31
                echo "                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
            // line 37
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "
        </div>
    </div>

";
    }

    // line 44
    public function block_javascript_footer($context, array $blocks = [])
    {
        // line 45
        echo "    ";
        $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "jquery"], "method");
        // line 46
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-theme://js/owl.carousel.min.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\">
        jQuery(document).ready(function () {
            jQuery('#g-owlcarousel-";
        // line 49
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "').owlCarousel({
                items: 1,
                rtl: ";
        // line 51
        if (($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "page", []), "direction", []) == "rtl")) {
            echo "true";
        } else {
            echo "false";
        }
        echo ",
                loop: true,
                ";
        // line 53
        if (($this->getAttribute(($context["particle"] ?? null), "nav", []) == "enable")) {
            // line 54
            echo "                nav: true,
                navText: ['";
            // line 55
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "prevText", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "prevText", []), "<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>")) : ("<i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i>")), "js"), "html", null, true);
            echo "', '";
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "nextText", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "nextText", []), "<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>")) : ("<i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i>")), "js"), "html", null, true);
            echo "'],
                ";
        } else {
            // line 57
            echo "                nav: false,
                ";
        }
        // line 59
        echo "                ";
        if (($this->getAttribute(($context["particle"] ?? null), "dots", []) == "enable")) {
            // line 60
            echo "                dots: true,
                ";
        } else {
            // line 62
            echo "                dots: false,
                ";
        }
        // line 64
        echo "                ";
        if (($this->getAttribute(($context["particle"] ?? null), "autoplay", []) == "enable")) {
            // line 65
            echo "                autoplay: true,
                autoplayTimeout: ";
            // line 66
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["particle"] ?? null), "autoplaySpeed", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "autoplaySpeed", []), "5000")) : ("5000")), "html", null, true);
            echo ",
                ";
        } else {
            // line 68
            echo "                autoplay: false,
                ";
        }
        // line 70
        echo "            })
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "@particles/owlcarousel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 70,  202 => 68,  197 => 66,  194 => 65,  191 => 64,  187 => 62,  183 => 60,  180 => 59,  176 => 57,  169 => 55,  166 => 54,  164 => 53,  155 => 51,  150 => 49,  143 => 46,  140 => 45,  137 => 44,  129 => 38,  123 => 37,  115 => 31,  108 => 27,  102 => 26,  99 => 25,  96 => 24,  91 => 23,  88 => 22,  83 => 21,  81 => 20,  71 => 15,  64 => 12,  61 => 11,  57 => 10,  48 => 8,  45 => 7,  39 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@particles/owlcarousel.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/templates/g5_helium/particles/owlcarousel.html.twig");
    }
}
