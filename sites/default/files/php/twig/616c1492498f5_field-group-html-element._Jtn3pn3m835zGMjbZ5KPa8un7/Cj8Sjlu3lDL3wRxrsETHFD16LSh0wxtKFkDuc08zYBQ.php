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

/* modules/contrib/field_group/templates/field-group-html-element.html.twig */
class __TwigTemplate_1200d5e4b4d8eae9395e9edd5373559403d8cf9e0750b8ae653f6e30466229d5 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 20];
        $filters = ["escape" => 19];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
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
        // line 18
        echo "
<";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapper_element"] ?? null)), "html", null, true);
        echo " ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null)), "html", null, true);
        echo ">
  ";
        // line 20
        if (($context["title"] ?? null)) {
            // line 21
            echo "  <";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_element"] ?? null)), "html", null, true);
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null)), "html", null, true);
            echo ">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true);
            echo "</";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_element"] ?? null)), "html", null, true);
            echo ">
  ";
        }
        // line 23
        echo "  ";
        if (($context["collapsible"] ?? null)) {
            // line 24
            echo "  <div class=\"field-group-wrapper\">
  ";
        }
        // line 26
        echo "  ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null)), "html", null, true);
        echo "
  ";
        // line 27
        if (($context["collapsible"] ?? null)) {
            // line 28
            echo "  </div>
  ";
        }
        // line 30
        echo "</";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["wrapper_element"] ?? null)), "html", null, true);
        echo ">
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/field_group/templates/field-group-html-element.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 30,  91 => 28,  89 => 27,  84 => 26,  80 => 24,  77 => 23,  66 => 21,  64 => 20,  58 => 19,  55 => 18,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation for a fieldgroup html element.
 *
 * Available variables:
 * - title: Title of the group.
 * - title_element: Element to wrap the title.
 * - children: The children of the group.
 * - wrapper_element: The html element to use
 * - attributes: A list of HTML attributes for the group wrapper.
 *
 * @see template_preprocess_field_group_html_element()
 *
 * @ingroup themeable
 */
#}

<{{ wrapper_element }} {{ attributes }}>
  {% if title %}
  <{{ title_element }}{{ title_attributes }}>{{ title }}</{{ title_element }}>
  {% endif %}
  {% if collapsible %}
  <div class=\"field-group-wrapper\">
  {% endif %}
  {{children}}
  {% if collapsible %}
  </div>
  {% endif %}
</{{ wrapper_element }}>
", "modules/contrib/field_group/templates/field-group-html-element.html.twig", "C:\\MAMP\\htdocs\\IMD-THEMING\\modules\\contrib\\field_group\\templates\\field-group-html-element.html.twig");
    }
}
