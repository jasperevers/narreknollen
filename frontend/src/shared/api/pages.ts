import { fetchAPI } from "./client";

export interface WPPage {
    id: number;
    title: {
        rendered: string;
    };
    content: {
        rendered: string;
    };
}

export function getPages() {
    return fetchAPI<WPPage[]>("pages");
}