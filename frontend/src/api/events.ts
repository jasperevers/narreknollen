import { fetchAPI } from "./client";

export interface WPEvent {
    id: number;
    title: {
        rendered: string;
    };
    acf?: {
        date?: string;
        location?: string;
    };
}

export function getEvents() {
    return fetchAPI<WPEvent[]>("events");
}