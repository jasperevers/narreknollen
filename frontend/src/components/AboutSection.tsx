export default function AboutSection() {
    return (
        <section className="section container text-center">
            <h2>Over ons</h2>
            <p className="mt-2">
                De Narre Knollen zijn dé carnavalsvereniging van Soest.
                Samen vieren wij elk jaar een onvergetelijk feest!
            </p>

            <div className="grid grid-3 mt-6">
                <div className="custom-card">
                    <h3>🎉 Feesten</h3>
                    <p>De gezelligste avonden van het jaar</p>
                </div>

                <div className="custom-card">
                    <h3>🎭 Traditie</h3>
                    <p>Al jaren een begrip in Knollendam</p>
                </div>

                <div className="custom-card">
                    <h3>👥 Samen</h3>
                    <p>Carnaval vier je samen!</p>
                </div>
            </div>
        </section>
    );
}