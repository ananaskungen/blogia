<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

<!-- Specify a custom Tailwind configuration -->
<script type="tailwind-config">
{
  theme: {
    extend: {
      colors: {
        gray: colors.blueGray,
        pink: colors.fuchsia,  
      }
    }
  }
}
</script>


<!-- Snippet -->
<section class="flex flex-col justify-center antialiased bg-gray-200 text-gray-600 min-h-screen p-4">
    <div class="h-full">
        <!-- Card -->
        <div class="max-w-[360px] mx-auto">
            <div class="bg-white shadow-lg rounded-lg mt-9">
                <!-- Card header -->
                <header class="text-center px-5 pb-5">
                    <!-- Avatar -->
              
                    <!-- Card name -->
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Complete purchase</h3>
                    <div class="text-sm font-medium text-gray-500">Blogia AB</div>
                </header>
                <!-- Card body -->
                <div class="bg-gray-100 text-center px-5 py-6">
                    <form id="payment-form" method="POST" action="{{route('subscription.create')}}">
                        @csrf
                        <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
                        <div class="text-sm mb-6"><strong class="font-semibold">$3 / month</strong> Premium Plan</div>
                        
                      
                            <div class="flex-grow">
                                <input name="name" id="card-holder-name" class="text-sm text-gray-800 bg-white rounded-l leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" placeholder="Card Holder's Name" />
                            </div>
                            <div class="flex-grow">
                                <input name="email" id="card-holder-email" class="text-sm text-gray-800 bg-white rounded-l leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="email" placeholder="Email" />
                            </div>
                            <div class="flex shadow-sm rounded">
                                <div class="flex-grow">
                                    <input name="country" id="card-holder-country" class="text-sm text-gray-800 bg-white rounded-l leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" placeholder="Country" />
                                </div>
                     
                            </div>
                        <div class="space-y-3" id="card-element">
                        </div>
                        <button id="card-button" type="submit" data-secret="{{$intent->client_secret}}" class="font-semibold text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">Try Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')

    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount("#card-element")

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
               payment_method: {
                    type: 'card',
                    card: cardElement,
                    billing_details: {
                        name: 'Jane Doe',
                        email: 'jane@example.com',
                        address: {
                            country: 'US',
                            postal_code: '98765',
                        },
                    },
                },
            }
        )

        if(error) {
            cardBtn.disable = false 
        } else {
            let token = document.createElement('input') 
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)
            form.appendChild(token)
            form.submit();
        }
    })
</script>

