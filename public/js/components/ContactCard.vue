<template>
  <article class="transition-colors duration-300 hover:bg-purple-100 bg-purple-50 rounded-xl p-4 flex items-center justify-between space-x-4">
    <div class="flex items-center space-x-4">
      <img src="{{ Str::startsWith($contact->profile_picture, 'http') ? $contact->profile_picture : asset('storage/' . $contact->profile_picture) }}" 
                        alt="Profile picture of {{ $contact->name }}" 
                        class="rounded-full w-12 h-12">


      <div>
        <h2 class="text-lg font-bold">
          [[ contact.name ]]
        </h2>
        <p class="text-gray-500 text-sm">
          [[ contact.title ]]
        </p>
      </div>
    </div>

    <div>
      <a :href="`/contacts/${contact.id}`">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>
  </article>
</template>

<script>
export default {
  props: {
    contact: {
      type: Object,
      required: true
    }
  },
  computed: {
    profilePictureUrl() {
      return this.contact.profile_picture.startsWith('http')
        ? this.contact.profile_picture
        : `/storage/${this.contact.profile_picture}`;
    }
  }
};
</script>

<style scoped>
article {
  transition: background-color 0.3s, color 0.3s;
}
</style>
