<section>
  <div class="py-12 px-6 flex flex-col">
    
    {{-- content section --}}
    <div class="bg-white">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
          <h1 class="mt-2 text-3xl font-bold tracking-tight text-second sm:text-4xl">{{ round($item_safety) }}% of items not secure?</h1>
          <div class="mt-10 grid max-w-xl grid-cols-1 gap-8 text-base leading-7 text-gray-700 lg:max-w-none lg:grid-cols-2">
            <div>
              <p><span class="font-bold text-second">Warning? </span>This warning will show up when 45% or more of your items are not secure anymore. What do we mean with not secure items? Not secure items are items that have not been upated for over a year or longer.</p>
              <p class="mt-8">This means that your passwords are not safe anymore. "hackers" will have a bigger chance cracking your password because they are older then one year and have more time to crack them.</p>
            </div>
            <div>
              <p><span class="font-bold text-second">What should you do? </span>Its simple, just update your item/items. Underneath you you have a table of all the items that are not secure anymore, and you can just simply update the items.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- not secure items table --}}
    <div>
      <x-not-secure-items-table :catagories="$catagories" :items="$items"/>
    </div>
  </div>
</section>