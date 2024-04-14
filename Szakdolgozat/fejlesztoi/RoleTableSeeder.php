public function run(): void
{
    $roles = [
            'admin',
            'user',
        ];

    foreach ($roles as $role)
    {
        DB::table('roles')->insert([
            'name' => $role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
