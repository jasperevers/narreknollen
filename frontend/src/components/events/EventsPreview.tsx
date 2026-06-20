import {Link} from "react-router-dom";

export default function EventsPreview() {
    const events = [
        {id: 1, title: "Optocht", date: "10 feb"},
        {id: 2, title: "Prinsenbal", date: "15 feb"},
        {id: 3, title: "Kleintje carnaval", date: "15 feb"},
    ];

    return (
        <section className="section container">
            <h2>Evenementen</h2>

            <div className="grid">
                {events.map((event) => (
                    <Link
                        key={event.id}
                        to={`/events/${event.id}`}
                        className="custom-card custom-card--link"
                    >
                        <h3>{event.title}</h3>

                        <p className="custom-card__location">
                            Duivenzaaltje, Oostergracht 46 3763 ZL Soest
                        </p>

                        <p className="custom-card__date">{event.date}</p>

                        <p className="custom-card__summary">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>

                        <span className="custom-card__link">
              Meer info →
            </span>
                    </Link>
                ))}
            </div>
        </section>
    );
}