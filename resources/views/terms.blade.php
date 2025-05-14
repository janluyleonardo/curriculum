<x-guest-layout>
  <div class="pt-4 bg-gray-100">
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
      <div>
        <x-jet-authentication-card-logo />
      </div>

      {{-- <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $terms !!}
            </div> --}}
      <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
        <div class="container">
          <h1>Términos y Condiciones</h1>

          <section>
            <h2>1. Aceptación de los Términos</h2>
            <p>Al acceder y utilizar nuestro sitio web, usted acepta estar sujeto a estos Términos y Condiciones. Si no
              está de acuerdo con alguna parte de estos términos, no debe utilizar nuestro sitio web.</p>
          </section>

          <section>
            <h2>2. Descripción del Servicio</h2>
            <p>Nuestro sitio web ofrece un servicio gratuito para la generación de currículums vitae. Además, a través
              de una suscripción opcional, los usuarios pueden recibir publicidad de productos de nuestros
              patrocinadores e inversionistas, quienes son exclusivamente compañías colombianas.</p>
          </section>

          <section>
            <h2>3. Uso del Servicio</h2>
            <ul>
              <li><strong>Generación de Currículums Vitae:</strong> El servicio de generación de currículums vitae es
                gratuito y está disponible para todos los usuarios registrados.</li>
              <li><strong>Suscripción a Publicidad:</strong> Los usuarios pueden optar por suscribirse para recibir
                publicidad de productos de nuestros patrocinadores e inversionistas colombianos. Esta suscripción es
                opcional y puede ser cancelada en cualquier momento.</li>
            </ul>
          </section>

          <section>
            <h2>4. Privacidad y Protección de Datos</h2>
            <p>Nos comprometemos a proteger la privacidad de nuestros usuarios. Para más información sobre cómo
              manejamos los datos personales, consulte nuestra Política de Privacidad.</p>
          </section>

          <section>
            <h2>5. Responsabilidades del Usuario</h2>
            <ul>
              <li>Los usuarios son responsables de la exactitud y veracidad de la información proporcionada para la
                generación de sus currículums vitae.</li>
              <li>Los usuarios deben mantener la confidencialidad de sus credenciales de acceso y no compartir su cuenta
                con terceros.</li>
            </ul>
          </section>

          <section>
            <h2>6. Limitación de Responsabilidad</h2>
            <p>No nos hacemos responsables de cualquier daño o perjuicio derivado del uso de nuestro sitio web o de la
              información proporcionada en los currículums vitae generados.</p>
          </section>

          <section>
            <h2>7. Modificaciones a los Términos y Condiciones</h2>
            <p>Nos reservamos el derecho de modificar estos Términos y Condiciones en cualquier momento. Las
              modificaciones entrarán en vigor inmediatamente después de su publicación en el sitio web.</p>
          </section>

          <section>
            <h2>8. Ley Aplicable y Jurisdicción</h2>
            <p>Estos Términos y Condiciones se regirán e interpretarán de acuerdo con las leyes de Colombia, y cualquier
              disputa que surja en relación con estos términos será sometida a la jurisdicción exclusiva de los
              tribunales de <strong>Bogota, Colombia</strong>.</p>
          </section>

          <section>
            <h2>9. Contacto</h2>
            <p>Si tiene alguna pregunta o comentario sobre estos Términos y Condiciones, no dude en ponerse en contacto
              con nosotros a través de <strong>{{ env('MAIL_FROM_ADDRESS') }}</strong>.</p>
          </section>

          <footer>
            <p>Fecha de entrada en vigor: Enero del <strong>{{ now()->format('Y') }}</strong></p>
          </footer>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
