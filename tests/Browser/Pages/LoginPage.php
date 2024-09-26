<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class LoginPage extends Page
{
  /**
   * Get the URL for the page.
   */
  public function url(): string
  {
    return '/login';
  }

  /**
   * Assert that the browser is on the page.
   */
  public function assert(Browser $browser): void
  {
    $browser->assertPathIs($this->url());
  }

  /**
   * Get the element shortcuts for the page.
   *
   * @return array<string, string>
   */
  public function elements(): array
  {
    return [
      '@email' => 'input[name=email]',
      '@password' => 'input[name=password]',
      '@submit' => 'button[type=submit]'
    ];
  }
}
