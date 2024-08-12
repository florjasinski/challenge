<x-layout-register>
    <div id="app">
        <section class="px-6 py-8 bg-white-100">
            <main class="max-w-4xl mx-auto mt-10 lg:mt-20 space-y-6">
                <article class="bg-gray-100 shadow-lg rounded-lg p-8 lg:p-12 relative">
                    <form method="POST" action="/api/contacts" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">[[ name ]]</label>
                                <input type="text" name="name" id="name"
                                    class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="surname" class="block text-sm font-medium text-gray-700">[[ surname ]]</label>
                                <input type="text" name="surname" id="surname"
                                    class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">[[ title ]]</label>
                                <input type="text" name="title" id="title"
                                    class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="profile_picture" class="block text-sm font-medium text-gray-700">[[ profile ]]</label>
                                <input type="file" name="profile_picture" id="profile_picture"
                                    class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">[[ address ]]</label>
                                <input type="text" name="address" id="address"
                                    class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">[[ phone ]]</label>
                                <input type="text" name="phone" id="phone"
                                    class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div id="map" style="height: 100px; width: 100%;"></div> 

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">[[ email ]]</label>
                                <input type="email" name="email" id="email"
                                    class="mt-1 block w-full bg-white border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="flex justify-center mt-8">
                            <button type="submit" :disabled="loading"
                                class="bg-purple-500 text-white px-6 py-3 rounded-full shadow-md hover:bg-purple-600">
                                [[ loading ? 'Saving...' : 'Save' ]]
                            </button>
                        </div>

                        <div>
                        @if ($errors->any())
                            <ul>
                                
                                <li class="text-red-500">[[ fieldErrors ]]</li>
                                
                            </ul>
                        @endif
                    </div>
                    </form>
                </article>
            </main>
        </section>
    </div>

    <script>
        function initializeAutocomplete() {
            const input = document.getElementById('address');
            const autocomplete = new google.maps.places.Autocomplete(input, {
                types: ['geocode'], // types set to geocode to prioritize addresses
            });

            const map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -34.9011, lng: -56.1645 },
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            const marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function () {
                marker.setVisible(false);
                const place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17); // Zoom to the location
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
            });
        }

        function loadGoogleMapsScript() {
            const script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyBVc2w7AXS5GA4YZKfXtw17N9WAOnm7tzA&libraries=places&callback=initializeAutocomplete`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadGoogleMapsScript();
        });
    </script>
</x-layout-register>
