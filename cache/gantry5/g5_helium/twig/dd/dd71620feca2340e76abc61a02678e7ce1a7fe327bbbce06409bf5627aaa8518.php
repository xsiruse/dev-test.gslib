<?php

/* @nucleus/layout/grid.html.twig */
class __TwigTemplate_f12913a547917c661279d7a0bec97f2607ef645f8b88552a636b991642b5f946 extends Twig_Template
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
        $context["attr_extra"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->attributeArrayFilter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "extra", []));
        // line 2
        $context["class"] = ("g-grid" . (($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "class", [])) ? ((" " . twig_join_filter($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "class", []), " "))) : ("")));
        // line 4
        ob_start();
        // line 5
        echo "    ";
        if ($this->getAttribute(($context["segment"] ?? null), "children", [])) {
            // line 6
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["segments"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["segment"]) {
                // line 7
                echo "            ";
                $this->loadTemplate((("@nucleus/layout/" . $this->getAttribute($context["segment"], "type", [])) . ".html.twig"), "@nucleus/layout/grid.html.twig", 7)->display(array_merge($context, ["segments" => $this->getAttribute($context["segment"], "children", [])]));
                // line 8
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['segment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 9
            echo "    ";
        }
        $context["html"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 12
        if (twig_trim_filter(($context["html"] ?? null))) {
            // line 13
            echo "        <div ";
            if ($this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "id", [])) {
                echo "id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["segment"] ?? null), "attributes", []), "id", []));
                echo "\" ";
            }
            echo "class=\"";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            echo "\"";
            echo ($context["attr_extra"] ?? null);
            echo ">";
            // line 14
            echo ($context["html"] ?? null);
            // line 15
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@nucleus/layout/grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 15,  81 => 14,  69 => 13,  67 => 12,  63 => 9,  49 => 8,  46 => 7,  28 => 6,  25 => 5,  23 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/layout/grid.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/media/gantry5/engines/nucleus/templates/layout/grid.html.twig");
    }
}
