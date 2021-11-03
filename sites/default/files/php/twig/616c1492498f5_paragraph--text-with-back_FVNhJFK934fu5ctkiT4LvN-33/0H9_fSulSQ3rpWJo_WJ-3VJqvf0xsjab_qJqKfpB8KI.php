<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/bailey/templates/paragraph--text-with-background-image.html.twig */
class __TwigTemplate_6016fa3b5989f2837eb287f1b876c5ca3f26941b05412213674812538ab5c855 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 1];
        $filters = ["field_target_entity" => 2, "escape" => 5];
        $functions = ["kpr" => 2, "file_url" => 2];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['field_target_entity', 'escape'],
                ['kpr', 'file_url']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["bg_img_url"] = $this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_media_image", []), "url", [], "method");
        // line 2
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\devel\Twig\Extension\Debug')->dump($this->env, $context, [0 => call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->env->getExtension('Drupal\twig_field_value\Twig\Extension\FieldValueExtension')->getTargetEntity($this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_media_image", []))), "field_media_image", []), "entity", []), "uri", []), "value", []))])]));
        echo "

<div class=\"bg_text\" style=\"background-image: url('bg_img_url');\"> 
    ";
        // line 5
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_body", [])), "html", null, true);
        echo "
</div>";
    }

    public function getTemplateName()
    {
        return "themes/bailey/templates/paragraph--text-with-background-image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 5,  57 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set bg_img_url= content.field_media_image.url() %}
{{ kpr(file_url(content.field_media_image|field_target_entity.field_media_image.entity.uri.value)) }}

<div class=\"bg_text\" style=\"background-image: url('bg_img_url');\"> 
    {{ content.field_body }}
</div>", "themes/bailey/templates/paragraph--text-with-background-image.html.twig", "C:\\MAMP\\htdocs\\IMD-THEMING\\themes\\bailey\\templates\\paragraph--text-with-background-image.html.twig");
    }
}
