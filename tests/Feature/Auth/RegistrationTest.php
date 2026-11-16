<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    // Memastikan tidak ada kesalahan validasi.
    $response->assertSessionHasNoErrors();

    // Memastikan pengguna berhasil login setelah registrasi.
    $this->assertAuthenticated();

    // Memastikan pengguna diarahkan ke halaman dashboard.
    $response->assertRedirect(route('dashboard', absolute: false));
});
