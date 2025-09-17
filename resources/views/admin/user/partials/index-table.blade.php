<div class="px-4 sm:px-6 lg:px-8">
  <div class="flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="relative min-w-full divide-y divide-border">
          <thead>
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-textColor sm:pl-3">Name</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-textColor">Email</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-textColor">Role</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-textColor">Created At</th>
              <th scope="col" class="py-3.5 pl-3 pr-4 sm:pr-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-containerBackground">
            @foreach ($users as $user)
                <tr class="even:bg-hover rounded-full">
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-textColor sm:pl-3">{{ $user->name }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <x-badges.roles-badge :role="$roles[$user->role_id]" />
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->created_at }}</td>
                </tr>    
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
