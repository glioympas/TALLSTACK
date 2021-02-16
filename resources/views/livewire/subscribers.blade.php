

<div class="p-6 bg-white border-b border-gray-200">
	<p class="text-2xl text-gray-600 font-bold mb-6 underline">
	    Subscribers
	</p>

	<div>
		<x-input type="text" class="rounded-lg border float-right border-gray-300 mb-4 pl-8 w-1/3" wire:model="search" placeholder="Search"></x-input>
		@if($subscribers->isEmpty())
		<div class="flex w-full bg-red-100 p-5 rounded-lg">
		<p class="text-red-400">No subscribers found.</p>
		</div>
		@else
		<table class="w-full">
			<thead class="border-b-2  border-gray-300 text-indigo-700">
			<tr>
			<th class="px-6 py-3 text-left">Email</th>
			<th  class="px-6 py-3 text-left">Verified</th>
			<th  class="px-6 py-3 text-left">Actions</th>
			</tr>
		</thead>

		<tbody >
			@foreach($subscribers as $subscriber)
				<tr class="text-sm text-indigo-900 border-b border-gray-400">
					<td class="px-6 py-5">{{ $subscriber->email }}</td>
					<td class="px-6 py-5">{{ optional($subscriber->email_verified_at)->diffForHumans() ?? 'Never' }}</td>
					<td>
						<form wire:submit.prevent="delete({{ $subscriber->id }})">
							<x-button class="border border-red-500 text-red-500 bg-red-50 hover:bg-red-200">Delete
	                        <span class="ml-2 animate-spin" wire:loading wire:target="delete({{$subscriber->id}})">&#9696;</span>
							</x-button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
		</table>
		@endif
	</div>

</div>