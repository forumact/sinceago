<?php

namespace Drupal\sinceago\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SinceAgo.
 */
class SinceAgo extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'sinceago.sinceago',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'since_ago';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('sinceago.sinceago');

    $form['info'] = [
      '#markup' => '<p>' . $this->t('Note that you can set Timeago as the default <a href="@datetime">date format</a>.', ['@datetime' => '/admin/config/regional/date-time']) . ' ' .
      $this->t('This will allow you to use it for all dates on the site, overriding the settings below.') . '</p>',
    ];
    $form['sinceago_node'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Use timeago for node creation dates'),
      '#default_value' => $config->get('sinceago_node'),
    ];
    $form['timeago_comment'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Use timeago for comment creation/changed dates'),
      '#default_value' => $config->get('timeago_comment'),
    ];
    $form['time_element'] = [
      '#type' => 'radios',
      '#title' => $this->t('Time element'),
      '#options' => ['span' => $this->t('span'), 'abbr' => $this->t('abbr'), 'time (HTML5 only)' => $this->t('time (HTML5 only)')],
      '#default_value' => $config->get('time_element'),
    ];
    $form['timeago_script_setting'] = array(
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('OVERRIDE TIMEAGO SCRIPT SETTINGS'),
    );
    $form['timeago_script_setting']['refresh_timeago'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Refresh Timeago dates after'),
      '#maxlength' => 64,
      '#size' => 64,
      '#description' => $this->t('Timeago can update its dates without a page refresh at this interval. Leave blank or set to zero to never refresh Timeago dates.'),
      '#default_value' => $config->get('refresh_timeago'),
    ];
    $form['timeago_script_setting']['allow_future'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Allow future dates'),
      '#default_value' => $config->get('allow_future'),
    ];
    $form['timeago_script_setting']['titeattr_timeago'] = [
      '#type' => 'textfield',
      '#title' => $this->t(' Set the "title" attribute of Timeago dates to a locale-sensitive date'),
      '#description' => $this->t('If this is disabled (the default) then the "title" attribute defaults to the original date that the Timeago script is replacing.'),
      '#maxlength' => 64,
      '#size' => 64,      '#default_value' => $config->get('donotuse_timeago'),
    ];
    $form['timeago_script_setting']['donotuse_timeago'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Do not use Timeago dates after'),
      '#description' => $this->t('Leave blank or set to zero to always use Timeago dates.'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('donotuse_timeago'),
    ];
    $form['string_settings'] = array(
      '#type' => 'details',
      '#open' => FALSE,
      '#title' => $this->t('OVERRIDE TIMEAGO STRING SETTINGS'),
    );
    $form['string_settings']['prefix_ago'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Prefix ago'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('prefix_ago'),
    ];
    $form['string_settings']['prefix_ago'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Prefix ago'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('prefix_ago'),
    ];
    $form['string_settings']['prefix_from_now'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Prefix from now'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('prefix_from_now'),
    ];
    $form['string_settings']['suffix_ago'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Suffix ago'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('suffix_ago'),
    ];
    $form['string_settings']['suffix_from_now'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Suffix from now'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('suffix_from_now'),
    ];
    $form['string_settings']['seconds'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Seconds'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('seconds'),
    ];
    $form['string_settings']['minute'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Minute'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('minute'),
    ];
    $form['string_settings']['minutes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Minutes'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('minutes'),
    ];
    $form['string_settings']['hour'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Hour'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('hour'),
    ];
    $form['string_settings']['hours'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Hours'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('hours'),
    ];
    $form['string_settings']['day'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Day'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('day'),
    ];
    $form['string_settings']['days'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Days'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('days'),
    ];
    $form['string_settings']['month'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Month'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('month'),
    ];
    $form['string_settings']['months'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Months'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('months'),
    ];
    $form['string_settings']['year'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Year'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('year'),
    ];
    $form['string_settings']['years'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Years'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('years'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('sinceago.sinceago')
      ->set('sinceago_node', $form_state->getValue('sinceago_node'))
      ->set('timeago_comment', $form_state->getValue('timeago_comment'))
      ->set('time_element', $form_state->getValue('time_element'))
      ->set('prefix_ago', $form_state->getValue('prefix_ago'))
      ->set('prefix_from_now', $form_state->getValue('prefix_from_now'))
      ->set('suffix_ago', $form_state->getValue('suffix_ago'))
      ->set('suffix_from_now', $form_state->getValue('suffix_from_now'))
      ->set('seconds', $form_state->getValue('seconds'))
      ->set('minute', $form_state->getValue('minute'))
      ->set('minutes', $form_state->getValue('minutes'))
      ->set('hour', $form_state->getValue('hour'))
      ->set('hours', $form_state->getValue('hours'))
      ->set('day', $form_state->getValue('day'))
      ->set('days', $form_state->getValue('days'))
      ->set('month', $form_state->getValue('month'))
      ->set('months', $form_state->getValue('months'))
      ->set('year', $form_state->getValue('year'))
      ->set('years', $form_state->getValue('years'))
      ->save();
  }

}
