<?php

/**
 * @file
 * Provides the Google No CAPTCHA administration settings.
 */

/**
 * Form callback; administrative settings for Google No CAPTCHA.
 */
function recaptcha_admin_settings() {
  // Load the recaptcha library. Error if library does not load.
  if (!_recaptcha_load_library()) {
    backdrop_set_message(t('Error loading recaptchalib.'), 'error');
    return FALSE;
  }

  $config = config('recaptcha.settings');

  $form = array();
  $form['recaptcha_site_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Site Key'),
    '#default_value' => $config->get('site_key'),
    '#maxlength' => 40,
    '#description' => t('The public key given to you when you <a href="@url" target="_blank">register for reCAPTCHA</a>.', array('@url' => 'https://www.google.com/recaptcha/admin#createsite')),
    '#required' => TRUE,
  );
  $form['recaptcha_private_key'] = array(
    '#type' => 'textfield',
    '#title' => t('Private Key'),
    '#default_value' => $config->get('private_key'),
    '#maxlength' => 40,
    '#description' => t('The public key given to you when you <a href="@url" target="_blank">register for reCAPTCHA</a>.', array('@url' => 'https://www.google.com/recaptcha/admin#createsite')),
    '#required' => TRUE,
  );
  // Add a submit button
  $form['actions']['#type'] = 'actions';
  $form['actions']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save configuration'),
  );
  return $form;
}

// Add a submit function to process config
function recaptcha_admin_settings_submit($form, &$form_state) {
  $config = config('recaptcha.settings');
  $config->set('site_key', $form_state['values']['recaptcha_site_key']);
  $config->set('private_key', $form_state['values']['recaptcha_private_key']);
  $config->save();
  backdrop_set_message(t('The configuration options have been saved.'));
}
