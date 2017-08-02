TCEFORM.tt_content {

	layout.altLabels.0 = Normale Darstellung
	layout.altLabels.1 = Absolut positioniert
	layout.altLabels.2 = Schwarzer Rahmen mit Innenabstand
	layout.altLabels.3 = Bilderrahmen
	layout.addItems.5 = Bilderrahmen mit Untertitel
	layout.altLabels.4 = Linkbox
	layout{
		removeItems = 7,8,9
	}


	//überschriften festlegen
	header_layout.removeItems = 1,4,5
	header_layout.altLabels.0 = Headline H1
	header_layout.altLabels.2 = Headline H2
	header_layout.altLabels.3 = Headline H3
}

//PAGE LAYOUT
TCEFORM.pages.layout {
    altLabels {
		0 = Weißer Hintergrund
        1 = Hellgrauer Hintergrund
		2 = Dunkelgrauer Hintergrund
    }
	removeItems{
		3
	}
}
TCEFORM.tt_content.spaceBefore.label.de = Absolute: links - Normal: oben
TCEFORM.tt_content.spaceAfter.label.de = Absolute: oben - Normal: unten


RTE.default {
	buttons.formatblock.items {
		h4.label = Überschrift in Textbox (Großbuchstaben)
	}
}

plugin.tx_attoworld.persistence.storagePid = 1

TCEFORM.tt_content.layout.removeItems = 1,2,3