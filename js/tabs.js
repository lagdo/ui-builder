/**
 * Set handlers for tabs
 */
function setUiBuilderTabEventListeners({ containerId, tabs })
{
    const tabsContainer = document.getElementById(containerId);
    tabsContainer?.addEventListener("click", (event) => {
        const { tabClass, paneClass, activeClass, targetAttr } = tabs;

        // Find clicked tab button
        const clickedTab = event.target.closest(tabClass);
        // Ignore clicks outside tab buttons
        if (!clickedTab) {
            return;
        }

        // Get the target pane id
        const targetId = clickedTab.dataset[targetAttr];
        // Find the target pane
        const targetPane = clickedTabNav.querySelector(targetId);
        if (!targetPane) {
            return;
        }

        // Remove active from sibling buttons
        const tabSiblings = Array.from(clickedTab.parentElement.children);
        tabSiblings.filter(tab => tab.classList.contains(tabClass))
            .forEach(tab => tab.classList.remove(activeClass));
        // Activate clicked button
        clickedTab.classList.add(activeClass);

        // Remove active from sibling panes
        const paneSiblings = Array.from(targetPane.parentElement.children);
        paneSiblings.filter(pane => pane.classList.contains(paneClass))
            .forEach(pane => pane.classList.remove(activeClass));
        // Activate target pane
        targetPane.classList.add(activeClass);
    });
}
