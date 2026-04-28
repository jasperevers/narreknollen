export default function EventsPreview() {
    //TODO: later: data uit WordPress API halen

    const events = [
        { id: 1, title: "Optocht", date: "10 feb" },
        { id: 2, title: "Prinsenbal", date: "15 feb" },
    ];

    return (
        <section className="section container">
            <h2>Evenementen</h2>

            <div className="grid grid-3 mt-6">
                {events.map((event) => (
                    <div key={event.id} className="card">
                        <h3>{event.title}</h3>
                        <p>{event.date}</p>
                        <a href="/events">Meer info →</a>
                    </div>
                ))}
            </div>
        </section>
    );
}