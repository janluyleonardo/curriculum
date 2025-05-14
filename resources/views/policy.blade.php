<x-guest-layout>
  <div class="pt-4 bg-gray-100">
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
      <div>
        <x-jet-authentication-card-logo />
      </div>

      {{-- <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $policy !!}
            </div> --}}
      <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
        <div class="container">
          <h1>Política de Tratamiento de Datos de Uso de la Plataforma</h1>

          <section>
            <h2>1. Introducción</h2>
            <p>En nuestra plataforma, valoramos y protegemos la privacidad de nuestros usuarios. Esta Política de
              Tratamiento de Datos describe cómo recopilamos, utilizamos y protegemos la información personal de los
              usuarios que utilizan nuestros servicios.</p>
          </section>

          <section>
            <h2>2. Recopilación de Datos</h2>
            <p>Recopilamos información personal que los usuarios proporcionan al registrarse en nuestra plataforma,
              generar currículums vitae y solicitar modificaciones de plantillas. Esta información puede incluir, pero
              no se limita a, nombres, direcciones de correo electrónico y detalles de pago.</p>
          </section>

          <section>
            <h2>3. Uso de los Datos</h2>
            <ul>
              <li><strong>Generación de Plantilla por Defecto:</strong> Todos los usuarios pueden generar un currículum
                vitae utilizando nuestra plantilla por defecto sin costo alguno. No se requiere información de pago para
                este servicio.</li>
              <li><strong>Modificación de Plantillas:</strong> Si desea modificar la plantilla por defecto o solicitar
                una plantilla nueva, deberá realizar un pago según las tarifas establecidas. Para ello, el usuario
                deberá proporcionar información de pago y enviar una solicitud detallada a nuestro correo de contacto
                (<strong>{{ env('MAIL_FROM_ADDRESS') }}</strong>).</li>
            </ul>
          </section>

          <section>
            <h2>4. Protección de Datos</h2>
            <p>Implementamos medidas de seguridad técnicas y organizativas para proteger la información personal de
              nuestros usuarios contra el acceso no autorizado, la divulgación, la alteración y la destrucción.</p>
          </section>

          <section>
            <h2>5. Compartir Datos con Terceros</h2>
            <p>No compartimos información personal con terceros, excepto cuando sea necesario para cumplir con la ley,
              proteger nuestros derechos o cumplir con obligaciones legales.</p>
          </section>

          <section>
            <h2>6. Derechos del Usuario</h2>
            <p>Los usuarios tienen derecho a acceder, corregir, actualizar o eliminar su información personal en
              cualquier momento. Para ejercer estos derechos, los usuarios pueden ponerse en contacto con nosotros a
              través de <strong>{{ env('MAIL_FROM_ADDRESS') }}</strong>.</p>
          </section>

          <section>
            <h2>7. Cambios en la Política de Tratamiento de Datos</h2>
            <p>Nos reservamos el derecho de modificar esta Política de Tratamiento de Datos en cualquier momento. Las
              modificaciones entrarán en vigor inmediatamente después de su publicación en la plataforma.</p>
          </section>

          <section>
            <h2>8. Contacto</h2>
            <p>Si tiene alguna pregunta o comentario sobre esta Política de Tratamiento de Datos, no dude en ponerse en
              contacto con nosotros a través de <strong>{{ env('MAIL_FROM_ADDRESS') }}</strong>.</p>
          </section>

          <footer>
            <p>Fecha de entrada en vigor: Enero del <strong>{{ now()->format('Y') }}</strong></p>
          </footer>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
