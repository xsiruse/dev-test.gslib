<?php

/* @nucleus/partials/particle.html.twig */
class __TwigTemplate_b9742378b0255ad1bb703c5a14aff4228cfb6698a8533c68c61f3d3175f48a89 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascript' => [$this, 'block_javascript'],
            'javascript_footer' => [$this, 'block_javascript_footer'],
            'particle' => [$this, 'block_particle'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = [];
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "head";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 2
        echo "    ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 4
        echo "
    ";
        // line 5
        $this->displayBlock('javascript', $context, $blocks);
        $content = ob_get_clean();
        $assetFunction($content, $location, $priority);
        // line 9
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = [];
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "footer";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 10
        echo "    ";
        $this->displayBlock('javascript_footer', $context, $blocks);
        $content = ob_get_clean();
        $assetFunction($content, $location, $priority);
        // line 14
        $this->displayBlock('particle', $context, $blocks);
    }

    // line 2
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 3
        echo "    ";
    }

    // line 5
    public function block_javascript($context, array $blocks = [])
    {
        // line 6
        echo "    ";
    }

    // line 10
    public function block_javascript_footer($context, array $blocks = [])
    {
        // line 11
        echo "    ";
    }

    // line 14
    public function block_particle($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "@nucleus/partials/particle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 14,  83 => 11,  80 => 10,  76 => 6,  73 => 5,  69 => 3,  66 => 2,  62 => 14,  57 => 10,  45 => 9,  41 => 5,  38 => 4,  35 => 2,  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@nucleus/partials/particle.html.twig", "/home/guitars1/dev-test.gslib.ru/public_html/media/gantry5/engines/nucleus/templates/partials/particle.html.twig");
    }
}
